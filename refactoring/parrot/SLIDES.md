---
marp: true
title: Parrot Kata: Refactoring in Baby Steps
author: Workshop IPC26 Berlin
theme: default
paginate: true
---

<style>
:root {
  --bg1: #ffffff;
  --bg2: #f6f8fa;
  --ink: #1f2328;
  --muted: #57606a;
  --green: #1a7f37;
  --blue: #0969da;
  --purple: #8250df;
  --orange: #bc4c00;
  --line: #d0d7de;
}

section {
  background: radial-gradient(1200px 700px at 80% -10%, #f1f6ff 0%, var(--bg1) 55%);
  color: var(--ink);
  font-family: -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  font-size: 26px;
  padding: 60px 70px;
}

h1 { color: #1f2328; font-size: 1.9em; letter-spacing: -0.5px; }
h2 {
  color: var(--green);
  font-size: 1.25em;
  border-bottom: 2px solid var(--line);
  padding-bottom: .25em;
  margin-bottom: .6em;
}
h3 { color: var(--blue); }
strong { color: #1f2328; }
a { color: var(--blue); }
.muted { color: var(--muted); }

section.lead { text-align: center; }
section.lead h1 { font-size: 2.6em; }
section.lead h2 { border: 0; color: var(--blue); }

pre {
  background: #f6f8fa !important;
  border: 1px solid var(--line);
  border-radius: 12px;
  box-shadow: 0 10px 24px rgba(140,149,159,.25);
  font-size: .72em;
  padding: 1em 1.2em;
}
code { font-family: "JetBrains Mono", "SF Mono", Menlo, Consolas, monospace; }
:not(pre) > code {
  background: #eaeef2; color: var(--orange);
  padding: .08em .4em; border-radius: 6px; font-size: .88em;
}

blockquote {
  background: rgba(26,127,55,.08);
  border-left: 5px solid var(--green);
  border-radius: 10px;
  padding: .7em 1.1em;
  margin-top: .8em;
  color: #1a4d2e;
  font-size: .95em;
}
blockquote strong { color: var(--green); }

.commit {
  display: inline-block;
  background: #eaeef2;
  border: 1px solid var(--line);
  color: var(--muted);
  font-family: "JetBrains Mono", Menlo, monospace;
  font-size: .62em;
  padding: .35em .8em;
  border-radius: 999px;
  margin-bottom: .4em;
}
.commit b { color: var(--green); font-weight: 600; }

.flow { display: flex; flex-direction: column; align-items: center; gap: 10px; margin-top: 8px; }
.node {
  background: #ffffff;
  border: 1px solid var(--line);
  border-radius: 14px;
  padding: 14px 26px;
  text-align: center;
  box-shadow: 0 8px 18px rgba(140,149,159,.2);
  min-width: 210px;
}
.node .t { font-weight: 700; font-size: 1.05em; color:#1f2328; }
.node .s { color: var(--muted); font-size: .72em; margin-top: 4px; }
.node.iface   { border-color: var(--purple); }
.node.iface .t   { color: var(--purple); }
.node.abstract{ border-color: var(--blue); }
.node.abstract .t{ color: var(--blue); }
.node.leaf    { border-color: var(--green); }
.node.leaf .t    { color: var(--green); }
.arrow { color: var(--muted); font-size: 1.4em; line-height: 1; }
.leaves { display: flex; gap: 18px; justify-content: center; }

.rail { display:flex; gap:10px; flex-wrap:wrap; margin-top:.2em; }
.chip {
  background: #ffffff; border:1px solid var(--line); border-radius:10px;
  padding:.5em .8em; font-size:.7em; color: var(--muted);
}
.chip b { color:#1f2328; }

.cols { display:flex; gap:28px; }
.cols > div { flex:1; }
.green { color: var(--green); }
.red { color: #cf222e; }
</style>

<!-- _class: lead -->

# 🦜 Parrot Kata

## Refactoring in **Baby Steps**

<div class="muted">One <code>match</code>-everything class becomes a clean polymorphic design.<br/><b>14 tiny green commits.</b></div>

<br/>

<div class="muted">Workshop · IPC26 Berlin</div>

---

## The golden rule

<div class="flow">
  <div class="node" style="border-color:var(--green); min-width:520px;">
    <div class="t green" style="font-size:1.2em;">🟢 Tests stay green after every commit</div>
  </div>
</div>

<br/>

- **One idea** per commit.
- Run tests before you commit.
- Refactoring changes the **shape**, never the **behavior**.

> 🔑 Red step means too big. **Shrink it.**

---

## Where we start 😵‍💫

<div class="cols">
<div>

```php
class Parrot
{
    public function __construct(
        private ParrotTypeEnum $type,
        private int $numberOfCoconuts,
        private float $voltage,
        private bool $isNailed
    ) {}

    public function getSpeed(): float
    {
        return match ($this->type) {
            EUROPEAN => ...,
            AFRICAN  => ...,
            NORWEGIAN_BLUE => ...,
        };
    }
    // getCry() also matches $type
}
```

</div>
<div>

**The smell**

- 🔁 One class. Every parrot.
- 🔁 `match ($type)` twice.

<br/>

<div class="node leaf"><div class="t">Goal</div><div class="s">one class per parrot, no <code>match</code> on type</div></div>

</div>
</div>

---

## The destination 🎯

<div class="flow">
  <div class="node iface">
    <div class="t">«interface» ParrotInterface</div>
    <div class="s">constants · getSpeed() · getCry()</div>
  </div>
  <div class="arrow">▲</div>
  <div class="node abstract">
    <div class="t">Parrot &nbsp;<span class="s">(abstract)</span></div>
    <div class="s">makeParrot() factory · getBaseSpeed()</div>
  </div>
  <div class="arrow">▲</div>
  <div class="leaves">
    <div class="node leaf"><div class="t">EuropeanParrot</div><div class="s">no state</div></div>
    <div class="node leaf"><div class="t">AfricanParrot</div><div class="s">coconuts</div></div>
    <div class="node leaf"><div class="t">NorwegianBlueParrot</div><div class="s">voltage · nailed</div></div>
  </div>
</div>

<br/>

> 🔑 New parrot equals **add a class**. Touch nothing else. ✨

---

## The route: 3 acts, 14 steps 🗺️

<div class="cols">
<div>
<div class="node iface" style="min-width:auto;"><div class="t">Act I · Prepare</div><div class="s">steps 1–5</div></div>
<br/>
Make the seams.
</div>
<div>
<div class="node abstract" style="min-width:auto;"><div class="t">Act II · Push down</div><div class="s">steps 6–9</div></div>
<br/>
Behavior into each parrot.
</div>
<div>
<div class="node leaf" style="min-width:auto;"><div class="t">Act III · Clean</div><div class="s">steps 10–14</div></div>
<br/>
Delete the leftovers.
</div>
</div>

<br/>

<div class="muted">Each step below is a real commit. 👇</div>

---

## Step 1 · Make the suite honest first

<span class="commit"><b>test:</b> drop obsolete unknown-parrot case</span>

```diff
- public function testUnknownParrotThrows(): void
- {
-     $this->expectExceptionMessage('Should be unreachable');
-     new Parrot(-1, 0, 0, false);   // -1 is not a valid enum
- }

  // and the now-unreachable arm:
- default => throw new Exception('Should be unreachable'),
```

> 🔑 Baseline was <span class="red">**red**</span>. Real `enum` can't be invalid. Green first.

---

## Step 2 · Name the magic numbers

<span class="commit"><b>ref:</b> extract speed magic numbers into constants</span>

```diff
+ private const float BASE_SPEED = 12.0;
+ private const float LOAD_FACTOR = 9.0;
+ private const float MIN_BASE_SPEED = 24.0;

- return min(24.0, $voltage * $this->getBaseSpeed());
+ return min(self::MIN_BASE_SPEED, $voltage * $this->getBaseSpeed());
```

> 🔑 Constants give meaning a home, and a place to move later.

---

## Steps 3–4 · Factory + interface

<div class="rail">
  <div class="chip"><b>3</b> &nbsp;ref: add makeParrot factory method</div>
  <div class="chip"><b>4</b> &nbsp;ref: extract ParrotInterface with constants</div>
</div>

<div class="cols">
<div>

```php
public static function makeParrot(
    /* …4 args… */
): self {
    return new self(
        $type, $numberOfCoconuts,
        $voltage, $isNailed,
    );
}
```

Tests call `Parrot::makeParrot(...)`, not `new Parrot(...)`.

</div>
<div>

```php
interface ParrotInterface
{
    public const float BASE_SPEED = 12.0;
    public const float LOAD_FACTOR = 9.0;
    public const float MIN_BASE_SPEED = 24.0;

    public function getSpeed(): float;
    public function getCry(): string;
}
```

</div>
</div>

> 🔑 Factory is the **seam** for subclasses. Interface makes the contract **explicit**.

---

## Step 5 · Create the subclasses (empty)

<span class="commit"><b>ref:</b> introduce subclass per parrot type via factory</span>

<div class="cols">
<div>

```php
abstract class Parrot
    implements ParrotInterface { /* … */ }

final class EuropeanParrot extends Parrot {}
final class AfricanParrot extends Parrot {}
final class NorwegianBlueParrot extends Parrot {}
```

</div>
<div>

```php
return match ($type) {
  EUROPEAN =>
    new EuropeanParrot($type, ...),
  AFRICAN =>
    new AfricanParrot($type, ...),
  NORWEGIAN_BLUE =>
    new NorwegianBlueParrot($type, ...),
};
```

</div>
</div>

> 🔑 Classes exist, behavior has not moved yet. Still <span class="green">**green**</span>. 🟢

---

## Step 6 · Open the door _(Act II: push behavior down)_

<span class="commit"><b>ref:</b> relax parrot members to protected for subclassing</span>

```diff
- private int $numberOfCoconuts,
+ protected int $numberOfCoconuts,
- private float $voltage,
+ protected float $voltage,
- private bool $isNailed,
+ protected bool $isNailed,
```

> 🔑 No behavior change. Boring prep keeps the next step tiny.

---

## Step 7 · European moves out

<span class="commit"><b>ref:</b> push European parrot behavior into EuropeanParrot</span>

<div class="cols">
<div>

```php
final class EuropeanParrot extends Parrot
{
    public function getSpeed(): float
    {
        return $this->getBaseSpeed();
    }

    public function getCry(): string
    {
        return 'Sqoork!';
    }
}
```

</div>
<div>

```diff
  match ($this->type) {
-     EUROPEAN => $this->getBaseSpeed(),
      AFRICAN  => ...,
      NORWEGIAN_BLUE => ...,
  }
```

<br/>

The base `match` gets one arm shorter.

</div>
</div>

> 🔑 Add the override **and** delete its `match` arm in the same commit.

---

## Step 8 · African moves out

<span class="commit"><b>ref:</b> push African parrot behavior into AfricanParrot</span>

```php
public function getSpeed(): float
{
    return max(0, $this->getBaseSpeed() - self::LOAD_FACTOR * $this->numberOfCoconuts);
}

public function getCry(): string { return 'Sqaark!'; }
```

> 🔑 The base `match` shrinks again. Only **Norwegian Blue** left. 🔽

---

## Step 9 · Norwegian Blue moves out

<span class="commit"><b>ref:</b> push Norwegian Blue behavior into NorwegianBlueParrot</span>

<div class="cols">
<div>

```php
public function getSpeed(): float
{
    return $this->isNailed
        ? 0
        : $this->getBaseSpeedWith($this->voltage);
}

public function getCry(): string
{
    return $this->voltage > 0 ? 'Bzzzzzz' : '...';
}
```

</div>
<div>

Base `match` is empty now, so make the base methods abstract:

```php
abstract public function getSpeed(): float;
abstract public function getCry(): string;
```

</div>
</div>

> 🔑 `match ($this->type)` is **gone**. Polymorphism replaced it. 🎉

---

## Steps 10–11 · Delete the dead _(Act III: clean the base)_

<div class="rail">
  <div class="chip"><b>10</b> &nbsp;ref: remove dead getLoadFactor method</div>
  <div class="chip"><b>11</b> &nbsp;ref: drop unused parrot type field from base</div>
</div>

<br/>

- `getLoadFactor()` has no caller left. Subclass uses the const.
- `$type` no longer switches anything.

```diff
- EUROPEAN => new EuropeanParrot($type, $numberOfCoconuts, ...)
+ EUROPEAN => new EuropeanParrot($numberOfCoconuts, ...)
```

> 🔑 Dead code is obvious only **after** the move. Sweep it then.

---

## Step 12 · Move the helper to its only user

<span class="commit"><b>ref:</b> move getBaseSpeedWith into NorwegianBlueParrot</span>

```diff
- // in abstract Parrot
- protected function getBaseSpeedWith(float $voltage): float { ... }

+ // in NorwegianBlueParrot
+ private function getBaseSpeedWith(float $voltage): float { ... }
```

> 🔑 One caller means not *shared*, just **misplaced**.

---

## Steps 13–14 · State follows behavior

<div class="rail">
  <div class="chip"><b>13</b> &nbsp;move voltage + isNailed → NorwegianBlueParrot ctor</div>
  <div class="chip"><b>14</b> &nbsp;move numberOfCoconuts → AfricanParrot ctor · drop base ctor</div>
</div>

<div class="cols">
<div>

```php
final class NorwegianBlueParrot extends Parrot {
    public function __construct(
        protected float $voltage,
        protected bool $isNailed,
    ) {}
}

final class AfricanParrot extends Parrot {
    public function __construct(
        protected int $numberOfCoconuts,
    ) {}
}
```

</div>
<div>

The factory hands each parrot **only what it needs**:

```php
EUROPEAN =>
  new EuropeanParrot(),
AFRICAN =>
  new AfricanParrot($coconuts),
NORWEGIAN_BLUE =>
  new NorwegianBlueParrot($voltage, $nailed),
```

</div>
</div>

---

## What we learned 🎓

<div class="cols">
<div>

- 🟢 **Green** every commit.
- 👶 **One idea** per commit.
- 🔀 **Add + remove together.**

</div>
<div>

- 🧹 **Dead code last.**
- 📦 **State follows behavior.**

</div>
</div>

<br/>

> **14 tiny steps beat 1 scary rewrite.**

---

<!-- _class: lead -->

# 🦜 Happy refactoring!

```bash
git log --oneline --reverse | tail -14   # each commit is a checkpoint
composer test                            # green at every one
```

<div class="muted">Your turn. Add a <b>4th parrot</b>:<br/>
new class · one <code>match</code> arm in <code>makeParrot</code> · <b class="green">zero</b> edits elsewhere. ✅</div>
